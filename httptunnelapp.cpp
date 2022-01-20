#include "httptunnelapp.h"

HttpTunnelApp::HttpTunnelApp(QObject *parent) : QObject(parent)
{

}




void HttpTunnelApp::execute()
{
    QThreadPool *pool = new QThreadPool();
    pool->setMaxThreadCount(10);

//    HttpWorker *worker = new HttpWorker(QUrl("https://www.yusufbulbul.com"), get);
    QByteArray json = makeJsonObject("getCommand", QStringList("params"));

    HttpWorker *worker = new HttpWorker(QUrl("http://localhost/service.php"), post, json);
    connect(worker, SIGNAL(readyForContent(QString)), this, SLOT(workerResultsCallBack(QString)));

    pool->start(worker);

}



QByteArray HttpTunnelApp::makeJsonObject(const QString &FunctionName, const QStringList &Params)
{
    QJsonObject obj;
    QJsonArray params;
    obj.insert("FunctionName", FunctionName);

    foreach (QString param, Params)
    {
      params.append(QJsonValue(param));
    }

    obj.insert("params", params);

    QJsonDocument doc(obj);

    qDebug() << "make json obj: " << doc.toJson();

    return doc.toJson();
}



void HttpTunnelApp::workerResultsCallBack(QString Result)
{
    qDebug() << Result;
}

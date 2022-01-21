#ifndef HTTPTUNNELAPP_H
#define HTTPTUNNELAPP_H

#include <QObject>
#include <QDebug>
#include <QThreadPool>
#include <QJsonObject>
#include <QJsonDocument>
#include <QJsonValue>
#include "httpworker.h"
#include "httprequest.h"


class HttpTunnelApp : public QObject
{
    Q_OBJECT
public:
    explicit HttpTunnelApp(QObject *parent = nullptr);

    void execute();
    QByteArray makeJsonObject(const QString &FunctionName, const QString &Params);
    std::string commandExec(const char* Cmd);

public slots:
    void commandPostResultsCallBack(QString Result);
    void consequencePostResultCallback(QString Result);
};

#endif // HTTPTUNNELAPP_H

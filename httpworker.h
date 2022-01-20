#ifndef HTTPWORKER_H
#define HTTPWORKER_H

#include <QObject>
#include <QThread>
#include <QRunnable>
#include <QMutex>
#include <QWaitCondition>

#include "httprequest.h"


enum WorkerType{
    post,
    get
};

class HttpWorker : public QObject, public QRunnable
{
    Q_OBJECT

    QUrl Request_Url;
    QString Result_;
    WorkerType Type_;
    QByteArray JsonObj_;

public:

    HttpWorker(const QUrl &Url, WorkerType Type, const QByteArray& Json);

    void run();



signals:
    void readyForContent(const QString &Content);




};

#endif // HTTPWORKER_H

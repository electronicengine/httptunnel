#ifndef HTTPREQUEST_H
#define HTTPREQUEST_H

#include <QObject>
#include <QtNetwork>
#include <QNetworkRequest>
#include <QNetworkAccessManager>
#include <memory>
#include <mutex>
#include <condition_variable>
#include <QUrl>
#include <QThread>


class HttpRequest : public QObject
{

    Q_OBJECT

    QUrl Url_;
    QNetworkAccessManager NA_Manager;
    QNetworkReply *N_Reply;
    QString Content_;

public:
    HttpRequest(const QUrl &Url);

    QString makeHttpRequest();
    QString makeHttpJsonPost(const QByteArray *JsonByteArray);

};


#endif // HTTPREQUEST_H

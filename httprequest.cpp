#include "httprequest.h"


HttpRequest::HttpRequest(const QUrl &Url) : Url_(Url)
{
}



QString HttpRequest::makeHttpRequest()
{

    N_Reply = NA_Manager.get(QNetworkRequest(Url_));

    while(!N_Reply->isFinished())
    {
        qApp->processEvents();
    }

    const QVariant redirectionTarget = N_Reply->attribute(QNetworkRequest::RedirectionTargetAttribute);

    if (!redirectionTarget.isNull())
    {
        Url_ = Url_.resolved(redirectionTarget.toUrl());
        makeHttpRequest();
    }
    else
    {
        Content_ = N_Reply->readAll();
    }

    return Content_;
}


QString HttpRequest::makeHttpJsonPost(const QByteArray *JsonByteArray)
{

    QNetworkRequest network_request(Url_);
    network_request.setHeader(QNetworkRequest::ContentTypeHeader,"application/json");

    if(JsonByteArray)
    {
        N_Reply = NA_Manager.post(network_request, *JsonByteArray);

        while(!N_Reply->isFinished())
        {
            qApp->processEvents();
            QThread::usleep(100000);
        }


        Content_ = N_Reply->readAll();

    }

    return Content_;

}





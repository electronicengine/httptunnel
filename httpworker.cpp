#include "httpworker.h"



HttpWorker::HttpWorker(const QUrl &Url, WorkerType Type, const QByteArray& Json) : Request_Url(Url), Type_(Type), JsonObj_(Json)
{

}



void HttpWorker::run()
{

    HttpRequest request(Request_Url);

    switch (Type_) {
    case get:

        emit readyForContent(request.makeHttpRequest());

        break;
    case post:

        emit readyForContent(request.makeHttpJsonPost(&JsonObj_));

    default:
        break;
    }

}



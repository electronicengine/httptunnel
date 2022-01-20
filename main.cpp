#include <QCoreApplication>
#include "httptunnelapp.h"

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);

    HttpTunnelApp app;

    app.execute();

    return a.exec();
}

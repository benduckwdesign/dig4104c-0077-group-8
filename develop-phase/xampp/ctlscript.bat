@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\hypersonic\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\server\hsql-sample-database\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\ingres\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\ingres\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\postgresql\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\postgresql\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\openoffice\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\openoffice\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache-tomcat\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\resin\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\resin\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\jetty\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\jetty\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\subversion\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\lucene\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\lucene\scripts\ctl.bat START)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\third_application\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\third_application\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\third_application\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\lucene\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\subversion\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\subversion\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\jetty\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\jetty\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\hypersonic\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\resin\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\resin\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache-tomcat\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\openoffice\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\openoffice\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\apache\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\ingres\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\ingres\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\scripts\ctl.bat STOP)
if exist C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\postgresql\scripts\ctl.bat (start /MIN /B C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\postgresql\scripts\ctl.bat STOP)

:end


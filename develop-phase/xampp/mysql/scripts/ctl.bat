@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop


"C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\bin\mysqld" --defaults-file="C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\bin\my.ini" --standalone
if errorlevel 1 goto error
goto finish

:stop
cmd.exe /C start "" /MIN call "C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\killprocess.bat" "mysqld.exe"

if not exist "C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\data\%computername%.pid" goto finish
echo Delete %computername%.pid ...
del "C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\mysql\data\%computername%.pid"
goto finish


:error
echo MySQL could not be started

:finish
exit

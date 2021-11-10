@echo off
cd /D %~dp0
cmd.exe /C start "" /MIN call "C:\Users\miniluigi\ucfgithubproject\dig4104c-0077-group-8\develop-phase\xampp\killprocess.bat" "httpd.exe"
if not exist apache\logs\httpd.pid GOTO exit
del apache\logs\httpd.pid

:exit

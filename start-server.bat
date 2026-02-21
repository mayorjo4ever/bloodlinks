@echo off
setlocal

:: Default IP address
set "local_ip=127.0.0.1"

:: Try to get first non-loopback IPv4
for /f "tokens=2 delims=:" %%f in ('ipconfig ^| findstr /i "IPv4" ^| findstr /v "127.0.0.1"') do (
    set "local_ip=%%f"
    goto after_loop
)

:after_loop
setlocal enabledelayedexpansion
set "local_ip=!local_ip: =!"

:: Set port
set "port=8001"

echo.
echo Using IP: %local_ip%
echo Opening Application at: http://%local_ip%:%port%
echo.


:: Open the app in your default browser
start http://%local_ip%:%port%

:: Change to project directory
cd /d "c:\xampp\htdocs\bloodlinks"

:: Start PHP built-in server
php -S %local_ip%:%port%

pause
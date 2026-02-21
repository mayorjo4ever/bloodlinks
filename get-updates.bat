@echo off
echo Checking for updates...

cd /d "C:\xampp\htdocs\bloodlinks"
git pull

echo Update complete!
pause

@echo off
echo ================================
echo Updating Bloodlinks Application...
echo ================================

REM Go to project directory
cd /d C:\xampp\htdocs\bloodlinks

REM Pull latest changes
echo Pulling latest code from Git...
git pull origin

IF %ERRORLEVEL% NEQ 0 (
    echo Git pull failed. Aborting.
    pause
    exit /b
)


echo ================================
echo Update completed successfully!
echo ================================
pause

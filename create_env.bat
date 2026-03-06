@echo off
echo ================================================
echo  HarmaalWale - One Time Setup
echo ================================================
echo.
echo This creates a local .env file with your cPanel
echo credentials. It is NEVER uploaded to GitHub.
echo.
set /p CPANEL_USER="cPanel username (harmakko): "
set /p CPANEL_TOKEN="cPanel API token: "
echo CPANEL_USER=!CPANEL_USER!> .env
echo CPANEL_TOKEN=!CPANEL_TOKEN!>> .env

:: Make sure .env is in .gitignore
findstr /c:".env" .gitignore >nul 2>&1
if errorlevel 1 echo .env>> .gitignore

echo.
echo ✅ .env created successfully!
echo You can now run deploy.bat
echo.
pause

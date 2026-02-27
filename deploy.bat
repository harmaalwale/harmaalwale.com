@echo off
cd /d C:\Harmaalwale\Website
git add .
git commit -m "auto: quick deploy"
git push origin main
echo.
echo Deployment triggered...
pause

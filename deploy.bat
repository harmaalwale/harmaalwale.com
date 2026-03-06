@echo off
echo ==========================================
echo   HarmaalWale Deploy Script
echo ==========================================

:: Stage all changes
git add -A

:: Commit with timestamp
for /f "tokens=1-3 delims=/ " %%a in ("%date%") do set d=%%a-%%b-%%c
for /f "tokens=1-2 delims=: " %%a in ("%time%") do set t=%%a%%b
git commit -m "Update %d% %t%" 2>nul || echo Nothing new to commit.

:: Push local master to remote main
echo.
echo Pushing to GitHub...
git push origin master:main

echo.
echo ==========================================
echo  GitHub will now auto-deploy to
echo  harmaalwale.com in ~20 seconds.
echo  Check: github.com/harmaalwale/harmaalwale.com/actions
echo ==========================================
pause

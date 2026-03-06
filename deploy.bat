@echo off
echo ==========================================
echo   HarmaalWale Deploy Script
echo ==========================================
echo.

:: Ask for commit message
set /p MSG="What did you change? "
if "%MSG%"=="" set MSG=Update

:: Stage all changes
git add -A

:: Commit
git commit -m "%MSG%"
if errorlevel 1 (
    echo Nothing new to commit.
)

:: Push - works whether local branch is main or master
echo.
echo Pushing to GitHub...
git push origin HEAD:main

echo.
echo ==========================================
echo  Done! GitHub is now auto-deploying to
echo  harmaalwale.com in ~20 seconds.
echo  Check: github.com/harmaalwale/harmaalwale.com/actions
echo ==========================================
pause

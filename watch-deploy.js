const { exec } = require("child_process");
const chokidar = require("chokidar");

const path = "C:/Harmaalwale/Website";

console.log("Watching for file changes...");

chokidar.watch(path, {
    ignored: /(^|[\/\\])\../,
    persistent: true
}).on("change", (file) => {

    console.log("Changed:", file);

    exec(`cd ${path} && git add . && git commit -m "auto: file update" && git push origin main`,
        (err, stdout, stderr) => {
            if (err) {
                console.log("Error:", err.message);
            } else {
                console.log("?? Auto deployed.");
            }
        }
    );

});

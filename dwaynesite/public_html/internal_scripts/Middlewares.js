"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var Middleware;
(function (Middleware) {
    const path = require("path");
    /**
     * Handles not found (404)
     */
    function NotFoundHandler(req, res) {
        res.status(404);
        res.render('pages/not_found', { title: `404: File Not Found (${req.url})` });
    }
    Middleware.NotFoundHandler = NotFoundHandler;
    /**
     * Handles internal server errors (generic 500)
     */
    function InternalErrorHandler(error, req, res, next) {
        res.status(500);
        res.render('pages/internal_error', { title: '500: Internal Server error', error: error });
    }
    Middleware.InternalErrorHandler = InternalErrorHandler;
    /**
     * Handles compression
     */
    function Compression(req, res, next) {
        const compression = require('compression');
        return compression({
            filter: (req, res) => {
                let p = req.url;
                if (p.indexOf("?") > -1)
                    p = p.split("?")[0];
                if (req.headers['x-no-compression'] || p.endsWith(".js") === false) {
                    // don't compress responses with this request header
                    // don't compress files that are not js
                    return false;
                }
                // fallback to standard filter function
                return compression.filter(req, res);
            }
        })(req, res, next);
    }
    Middleware.Compression = Compression;
    function FormUploadHandler(req, res, next) {
        let multer = require("multer");
        let accept = multer({
            preservePath: true,
            limits: {
                fileSize: 10000000
            },
            storage: multer.diskStorage({
                destination: path.resolve(__dirname, "../public_html/assets/uploads"),
                filename: function (req, file, cb) {
                    cb(null, `${Date.now()}-${file.originalname}`);
                }
            })
        }).any();
        accept(req, res, function () {
            // req.files will contain the files that have been uploaded, in the following format
            // file {
            //   originalname : string;
            //   encoding : string;
            //   mimetype : string;
            //   size : string; // in bytes
            //   path : string; // destination path
            //   buffer : Buffer;
            // }
            next();
        });
    }
    Middleware.FormUploadHandler = FormUploadHandler;
    /**
     * Enables live-server on local development
     */
    function LiveServer(req, res, next) {
        const args = process.argv.slice(2);
        if (args.indexOf("--dev") > -1) {
            let p = path.resolve(__dirname, '../assets');
            console.log("With live reload", p);
            return require('reloadify')(p)(req, res, next);
        }
        next();
    }
    Middleware.LiveServer = LiveServer;
})(Middleware = exports.Middleware || (exports.Middleware = {}));
//# sourceMappingURL=Middlewares.js.map
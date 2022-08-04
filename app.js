import express from "express";
import { join } from "path";
import connectDB from "./connection/connectDB.js";
import routes from "./routes/web.js";
import bodyParser from "body-parser";
const app = express();
const port = 3000;
app.use(express.static(join(process.cwd(), "public")));
app.use(express.urlencoded({ extended: true }));
// app.use(bodyParser.urlencoded({ extended: true }));

const DATABASE_URL = "mongodb://localhost:27017";
connectDB(DATABASE_URL);

app.set("views", "./views");
app.set("view engine", "ejs");
app.use("/", routes);

app.listen(port, () => {
  console.log("Server is Running");
});

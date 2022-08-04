import express from "express";
import articleModel from "../models/wikiModel.js";
const routes = express.Router();
routes.get("/", (req, res) => {
  res.send("Route Path from routes");
});
routes
  .route("/articles")
  .get(async (req, res) => {
    console.log("object");
    try {
      const allArticles = await articleModel.find();
      res.send(allArticles);
    } catch (error) {
      console.log(error);
      res.send("error");
    }
  })
  .post(async (req, res) => {
    try {
      const data = new articleModel({
        title: req.query.title,
        content: req.query.content,
      });

      await data.save();
      res.send("data saved successfuly");
    } catch (error) {
      console.log(error);
    }
  })
  .delete(async (req, res) => {
    try {
      await articleModel.deleteMany();
      res.send("deleted successfuly");
    } catch (error) {
      console.log(error);
    }
  });
////////////////////////////////////////////// specific articles ////////////////////////////////////////////////////////////////////
routes
  .route("/articles/:articleTitle")
  .get(async (req, res) => {
    console.log("object");
    try {
      const allArticles = await articleModel.find({
        title: req.params.articleTitle,
      });
      res.send(allArticles);
    } catch (error) {
      console.log(error);
      res.send("error");
    }
  })
  .put(async (req, res) => {
    try {
      await articleModel.replaceOne(
        { title: req.params.articleTitle },
        { title: req.query.title, content: req.query.content },
        { overwrite: true }
      );
      res.send("Article updated successfully");
    } catch (error) {
      console.log(error);
    }
  })
  .patch(async (req, res) => {
    try {
      await articleModel.updateOne(
        { title: req.params.articleTitle },
        { $set: req.query }
      );
      res.send("Article updated successfully..");
    } catch (error) {
      console.log(error);
    }
  })
  .delete(async (req, res) => {
    try {
      await articleModel.deleteOne({ title: req.params.articleTitle });
      res.send("Article Deleted Successfuly..");
    } catch (error) {
      console.log(error);
    }
  });
export default routes;

import mongoose from "mongoose";

const articleSchema = new mongoose.Schema({
  title: { type: "String" },
  content: { type: "String" },
});

const articleModel = mongoose.model("article", articleSchema);

export default articleModel;

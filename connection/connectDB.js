import mongoose from "mongoose";
const connectDB = async (DATABASE_URL) => {
  const dbOptions = {
    dbName: "wikiDB",
  };
  try {
    await mongoose.connect(DATABASE_URL, dbOptions);
    console.log("conneted to database");
  } catch (error) {
    console.log(error);
  }
};

export default connectDB;

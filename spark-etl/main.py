from pyspark.sql import SparkSession


def main():
    spark = SparkSession.builder.appName("BasicSparkExample").getOrCreate()

    # Read CSV file
    df = spark.read.csv("data/sample.csv", header=True, inferSchema=True)

    # Compute average age
    avg_age = df.agg({"age": "avg"}).collect()[0][0]
    print(f"Average age: {avg_age}")

    spark.stop()


if __name__ == "__main__":
    main()

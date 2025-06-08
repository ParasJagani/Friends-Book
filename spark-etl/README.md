# Spark ETL Example

This directory contains a very small example project that shows how to perform a basic ETL task using Apache Spark.

The example reads a CSV file containing names and ages, calculates the average age, and prints the result.

## Requirements

- Python 3.8 or newer (tested with Python 3.11)
- [PySpark](https://pypi.org/project/pyspark/)

Install the dependency with pip:

```bash
pip install pyspark
```

## Running the example

From the repository root, run:

```bash
python spark-etl/main.py
```

The script reads the data from `spark-etl/data/sample.csv` and outputs the average age.

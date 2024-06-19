# MongoDB Database Setup

Follow these steps to create a database and import collections in MongoDB:

1. Open the MongoDB shell.

2. Create a new database named `olxlist` by running the following command:
    ```bash
    use olxlist
    ```
    This command will create a new database named `olxlist` and switch to it.

3. To import collections, you can use MongoDB Compass. Follow these steps:

    - Open MongoDB Compass and connect to your MongoDB instance.
    
    - Select the `olxlist` database.
    
    - Click on "Collection" > "Import Data" and select the JSON files from the provided folder (`import_collections_mongodb`).

Optional: You can edit the admin details in the JSON file before importing it into the database.
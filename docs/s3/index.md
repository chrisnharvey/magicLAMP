# S3

magicLAMP includes a local S3-compatible object storage server powered by
[MinIO](https://min.io/). This is especially useful if your application
will store files in S3 as it allows you to use the same APIs that you
will use in production as well as support for pre-signed URLs.

## Authentication

You can configure the access key and secret used to access the S3 server in the
`.env` file, under `S3_ACCESS_KEY` and `S3_SECRET_KEY`

## Change where files are stored

You can change where files uploaded to your local S3 server are stored in the 
`.env` file, under `S3_DATA_DIR`.

By default, files will be stored in `data/s3`.
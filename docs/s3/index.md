# S3

magicLAMP includes a local S3-compatible object storage server powered by
[MinIO](https://min.io/). This is especially useful if your application
will store files in S3 as it allows you to use the same APIs that you
will use in production as well as support for pre-signed URLs.

**S3 Endpoint:** s3.localhost

!!! note "Paths"
    By default, the S3 SDK will use a subdomain style endpoint to access your
    bucket. In magicLAMP, you will need to use "path style" endpoints. This
    can be configured in your S3 configuration. In PHP/Laravel, this option
    can be used by setting `use_path_style_endpoint` to `true`.

## Accessing the GUI

MinIO has a built-in GUI which you can access at `s3.localhost`. Here you
can create buckets, manage and upload files and more.

## Authentication

You can configure the access key and secret used to access the S3 server in the
`.env` file, under `S3_ACCESS_KEY` and `S3_SECRET_KEY`

## Change where files are stored

You can change where files uploaded to your local S3 server are stored in the 
`.env` file, under `S3_DATA_DIR`.

By default, files will be stored in `data/s3`.

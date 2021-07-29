# Performance on macOS

## Adding volume flags

In your `.env` file set the `VOLUME_FLAGS` to `,cached`

### Use docker-sync

Install docker-sync

    ```
    gem install docker-sync
    ```

Start docker-sync

    ```
    docker-sync start
    ```

**Wait for this command to finish completely before continuing**

Start magicLAMP

    ```
    docker-compose -f docker-compose.yml -f docker-compose.docker-sync.yml up -d
    ```

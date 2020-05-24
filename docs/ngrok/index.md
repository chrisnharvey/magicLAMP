# ngrok

ngrok is a service that allows you to expose your local web server to anyone on the internet,
without having to configure port forwarding or firewall rules. ngrok will even generate a
URL for you to access your magicLAMP services from outside of your local network.

## Exposing a site

ngrok is installed in the workspace container. To expose a website, type the following
command. Replacing `mysite.74.localhost` with the magicLAMP URL that you want to expose.

```
ngrok http --host-header=mysite.74.localhost nginx:80
```

ngrox will then give you a public URL that will give you access to your local site
from anywhere in the world.
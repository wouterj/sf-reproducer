# CAS Authentication with Symfony

```bash
$ git clone --branch cas https://github.com/wouterj/sf-reproducer symfony-cas
$ cd symfony-cas

$ composer install

# clone the https://github.com/symfony/symfony/pull/48276 locally and use
# the `./link` utility to test it in this project

$ symfony serve -d
$ docker compose up -d
```

* Login to Keycloak Admin console at http://localhost:8080 with
  `admin:admin` and configure a CAS provider with `https://localhost:8000`
  as redirect URI (or whatever host the Symfony app runs on)

* Go to http://localhost:8080/realms/master/protocol/cas/login?service=https%3A%2F%2Flocalhost:8000
  (modify the `service` query parameter to match the Symfony host)

* Login, if necessary, as admin again

* Congratz, you're authenticated as "admin" in the Symfony app

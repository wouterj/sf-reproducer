FROM quay.io/keycloak/keycloak:22.0.4 as builder

ADD --chown=keycloak:root "https://github.com/jacekkow/keycloak-protocol-cas/releases/download/22.0.4/keycloak-protocol-cas-22.0.4.jar" /opt/keycloak/providers/

RUN /opt/keycloak/bin/kc.sh build

FROM quay.io/keycloak/keycloak:22.0.4

COPY --from=builder /opt/keycloak/providers/ /opt/keycloak/providers/
COPY --from=builder /opt/keycloak/lib/quarkus/ /opt/keycloak/lib/quarkus/

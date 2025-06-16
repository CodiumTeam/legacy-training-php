KATA_DIRECTORIES := $(wildcard */)

.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php .

.PHONY: docker-update-composer-lock
docker-update-composer-lock: docker-update-composer-lock-$(KATA_DIRECTORIES)

.PHONY: docker-update-composer-lock-$(KATA_DIRECTORIES)
docker-update-composer-lock-$(KATA_DIRECTORIES):
	cd $(subst docker-update-composer-lock-,,$@) && make docker-update-composer-lock

.PHONY: docker-push
docker-push:
	docker push codiumteam/legacy-training-php

.PHONY: docker-pull
docker-pull:
	docker pull codiumteam/legacy-training-php

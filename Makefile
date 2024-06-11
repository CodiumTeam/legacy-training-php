KATA_DIRECTORIES := $(wildcard */)
.PHONY: docker-build
docker-build: docker-build-$(KATA_DIRECTORIES)

.PHONY: docker-update-composer-lock
docker-update-composer-lock: docker-update-composer-lock-$(KATA_DIRECTORIES)

.PHONY: docker-build-$(KATA_DIRECTORIES)
docker-build-$(KATA_DIRECTORIES):
	cd $(subst docker-build-,,$@) && make docker-build

.PHONY: docker-update-composer-lock-$(KATA_DIRECTORIES)
docker-update-composer-lock-$(KATA_DIRECTORIES):
	cd $(subst docker-update-composer-lock-,,$@) && make docker-update-composer-lock

.PHONY: docker-push
docker-push:
	docker push codiumteam/legacy-training-php --all-tags

.PHONY: docker-remove-images
docker-remove-images:
	docker images codiumteam/legacy-training-php -q | xargs  docker rmi --force $1

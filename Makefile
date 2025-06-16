.PHONY: docker-build
docker-build:
	docker build -t codiumteam/legacy-training-php .

.PHONY: docker-push
docker-push:
	docker push codiumteam/legacy-training-php

.PHONY: docker-pull
docker-pull:
	docker pull codiumteam/legacy-training-php

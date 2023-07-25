# Hansecom - sf test


Foobar is a Python library for dealing with word pluralization.

## Installation
### Backend installation
1. To get up the containers

```bash
docker-compose up -d --build
```
2. To check if docker is up correctly

```bash
docker ps
```
3. Enter in php82 docker container

```bash
docker exec -it php82 bash
```
4. inside de container run 

```bash
cd project && composer install
```
After docker up correctly and project composer installed correctly

### Frontend installation

to get up vue application, go to the vue-project folder and run

```bash
npm install
```

to run the application 
```bash
npm run dev
```


## Usage 

[Test application click here](http://127.0.0.1:5173/)

### Backend Unit test 

inside de container php82 (backend installation step 3)

```bash
cd project && composer phpunit
```

### Backend details
* [Symfony](https://symfony.com/releases/6.3)) - O framework web usado
* Docker
* PHP8.2
* [CaptainHook](https://github.com/captainhookphp/captainhook) - Hook pre-commit
* [psalm](https://psalm.dev/) - Code static verification
* Solid

#### Backend Architecture
- [Clean Architecture](https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html)
- Action as a service


## Bonus

Postman collection to be imported.

#### Usage

Should define variables in Environments

| Variable | Initial value  |
|----------|----------------|
| host     | localhost:8000 |



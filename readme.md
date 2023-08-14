# GRPC -CLIENT

How to implement gRPC on the client side - PHP
## Installation

This example is written inside Dockercompose file. Just follow provided steps
## 1. Install protobuff compiler and necessary tools

```bash
RUN apt-get update && apt-get install -y \
        protobuf-compiler \
        zip \
        curl \
        unzip \
        cmake \
        git
```
## 2. Installing grpc and enabling php extension
```dockerfile
RUN pecl install grpc && docker-php-ext-enable grpc
```
This takes about 10 - 15 minutes if you want to speed up this process check out this
[link](https://cloud.google.com/php/grpc#build-from-source). Build from source

## 3. Installing protobuf and enabling php extension
```dockerfile
RUN pecl install protobuf && docker-php-ext-enable protobuf
```
This takes up to 5 minutes

## 4. Building grpc components and grpc_php_plugin
```dockerfile
# Cloning repo 
RUN git clone https://github.com/grpc/grpc /grpc
RUN cd /grpc && git submodule update --init
#generating code
RUN mkdir -p /grpc/cmake/build
RUN cd /grpc/cmake/build && cmake ../.. && make grpc_php_plugin
RUN chmod +x /grpc/cmake/build/grpc_php_plugin
```
grpc_php_plugin path /grpc/cmake/build/grpc_php_plugin

## Creating script for file generation
```bash
mkdir -p generated
#check is plugin executable
chmod +x /grpc/cmake/build/grpc_php_plugin
[ -x /grpc/cmake/build/grpc_php_plugin ] && echo "" || echo "Plugin not executable"
protoc --plugin=protoc-gen-php-grpc=/grpc/cmake/build/grpc_php_plugin \
       --php_out=./generated \
       --php-grpc_out=./generated \
       proto/user.proto
```
## Composer dependencies
``` json lines
    "require" : {
        "google/protobuf": "^3.24",
        "grpc/grpc": "^1.52",
    },
```
## Notes
* You have to do this in root of ur docker container / file <br />
* Make sure that grpc_php_plugin is executable!<br />
* **If service name matches with php_metadata_namespace or
php_namespace inside your .proto file the service will not generate**
mkdir -p generated
protoc --plugin=protoc-gen-php-grpc=./protoc-gen-php-grpc \
       --php_out=./generated \
       --php-grpc_out=./generated \
       proto/user.proto

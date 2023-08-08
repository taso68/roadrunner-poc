protoc --plugin=protoc-gen-php-grpc \
       --php_out=./generated \
       --php-grpc_out=./generated \
       proto/pinger.proto

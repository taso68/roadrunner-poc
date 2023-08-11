mkdir -p generated
#check is plugin executable
chmod +x /grpc/cmake/build/grpc_php_plugin
[ -x /grpc/cmake/build/grpc_php_plugin ] && echo "" || echo "Plugin not executable"
protoc --plugin=protoc-gen-php-grpc=/grpc/cmake/build/grpc_php_plugin \
       --php_out=./generated \
       --php-grpc_out=./generated \
       proto/user.proto


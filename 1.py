from minio import Minio
from minio.error import S3Error

# Thông tin xác thực Minio
minio_client = Minio(
    "192.168.231.128:9000",
    access_key="hoang",
    secret_key="12345678",
    secure=False  # Set True if you are using HTTPS
)

# Tên bucket bạn muốn liệt kê các tệp trong
bucket_name = "vanhoang"

try:
    objects = minio_client.list_objects(bucket_name, recursive=True)
    for obj in objects:
        print(f"File name: {obj.object_name}")
        print(obj.__str__())
except S3Error as e:
    print(f"Error: {e}")

object_name ='bai5_1803.txt'

try:
    minio_client.fget_object(bucket_name, object_name, 'green.png')
    print(f"download thanh cong !")
except S3Error as e:
    print(f"Error: {e}")

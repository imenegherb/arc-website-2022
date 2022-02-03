# gonetwork2022
Code source of arc website 2022 http://arc.usthb-celec.com

# Install on local
1. Download the repository.
2. Change  docker-compose.example.yml to  docker-compose.yml
3. Change database configuration : [https://github.com/CELEC-USTHB-CLUB/arc-website-2022/blob/main/docker-compose.example.yml#L17](https://github.com/CELEC-USTHB-CLUB/arc-website-2022/blob/main/docker-compose.example.yml#L17)
4. Run docker build and docker-compose up .
5. log into php image : docker-compose exec php bash
7. change .env.example to .env
8. Update database config in .env file.
9. Run composer install & composer dump -o
10. The application now is running on port 83.

# Extra configuration on celec production server .
With **HAPROXY** we could redirect requests from gonetwork.usthb-celec.com to the application .
```
frontend http
  bind :80
  mode http
  option httplog
  timeout connect 5000
  timeout client  50000
  timeout server  50000
  acl gonetworkdomain hdr(host) -i gonetwork.usthb-celec.com
  acl arc hdr(host) -i arc.usthb-celec.com
  use_backend gonetwork if gonetworkdomain
  use_backend arc if arc
  default_backend website

backend website
  mode http
  server website 0.0.0.0:81 check

backend gonetwork
  mode http
  server gonetworkweb 0.0.0.0:82 check

backend arc
  mode http
  server arc 0.0.0.0:83 check

```

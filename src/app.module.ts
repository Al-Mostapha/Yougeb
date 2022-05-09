import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { TypeOrmModule } from '@nestjs/typeorm';
import { UsersModule } from './Module/users.module';
import { User } from './Model/user.entity';


@Module({
  imports: [
    TypeOrmModule.forRoot({
      type: 'mysql',
      host: 'localhost',
      port: 3306,
      username: 'root',
      password: '',
      database: 'yougeb',
      entities: [User],
      synchronize: true,
    }),
  UsersModule
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}

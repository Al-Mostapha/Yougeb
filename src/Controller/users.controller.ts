import { Controller, Get } from '@nestjs/common';
import { UsersService } from './../Service/users.service';

@Controller()
export class UsersController {
  constructor(private readonly appService: UsersService) {}

  @Get()
  getHello(): string {
    return "Hello My Fiend";
  }
}

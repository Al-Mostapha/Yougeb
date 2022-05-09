
import { Entity, Column, PrimaryGeneratedColumn } from 'typeorm';


/**CREATE TABLE `q_user` (
  `id_user` int(11) NOT NULL,
  `id_url` varchar(64) NOT NULL,
  `mention_name` varchar(32) NOT NULL,
  `full_name` varchar(36) CHARACTER SET utf8mb4 NOT NULL,
  `brief` text DEFAULT NULL,
  `user_group` int(1) NOT NULL DEFAULT 0,
  `email` varchar(128) NOT NULL,
  `enc_pass` varchar(128) NOT NULL,
  `md5_pass` varchar(32) NOT NULL,
  `image` text DEFAULT NULL,
  `following` int(6) DEFAULT 0,
  `follower` int(6) DEFAULT 0,
  `score` int(12) DEFAULT 0,
  `question` int(6) DEFAULT 0,
  `answers` int(6) DEFAULT 0,
  `article` int(6) DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time_stamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */

@Entity({
  name: "q_user"
})
export class User {
  @PrimaryGeneratedColumn()
  id_user: number;
  @Column({length: 64, nullable: false})
  id_url: string;
  @Column({length: 32, nullable: false})
  mention_name: string;
  @Column({length: 36, nullable: false, charset: "utf8mb4"})
  full_name: string;
  @Column({type: "text", default: "User Has No brief"})
  brief: string;
  @Column({type: "tinyint", default: 0, nullable: false})
  user_group: number;
  @Column({length: 128, nullable: false})
  email: string;
  @Column({length: 128, nullable: false})
  enc_pass: string;
  @Column({length: 128, nullable: false})
  md5_pass: string;
  @Column({type: "text", default: null})
  image!: string;
  @Column({ default: 0, width: 6})
  following: number;
  @Column({ default: 0, width: 6})
  follower: number;
  @Column({ default: 0, width: 6})
  score: number;
  @Column({ default: 0, width: 6})
  question: number;
  @Column({ default: 0, width: 6})
  answers: number;
  @Column({ default: 0, width: 6})
  article: number;
  @Column({ default: null, length: 100})
  remember_token!: string;
  @Column({ type:"bigint", default: ()=> "current_timestamp()"})
  time_stamp: number;
  
}

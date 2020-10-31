package com.customer.controller;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.domain.EntityScan;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.data.jpa.repository.config.EnableJpaRepositories;


@SpringBootApplication
@EnableJpaRepositories("com.customer.repository")
@ComponentScan("com.customer")

@EntityScan("com.customer")
public class BootApp {

public static void main(String[] args) {
		SpringApplication.run(BootApp.class, args);
	}


}

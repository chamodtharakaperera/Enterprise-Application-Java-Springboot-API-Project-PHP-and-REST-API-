package com.customer.model;

import java.util.ArrayList;

import java.util.List;


import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import com.fasterxml.jackson.annotation.JsonManagedReference;




@Entity
@Table(name="Customer")
public class Customer {

	@Id
	@GeneratedValue
	private Long cusId;
	@Column(name="firstname")
	private String firstName;
	
	@Column(name="lastname")
	private String lastName;
	
	
	@Column(name="address")
	private String add;
	
	
	@Column(name="tel")
	private int tel;
	
	
	@Column(name="email")
	private String email;
	
	@Column(name="userName")
	private String username;
	
	@Column(name="password")
	private String password;
	
	@OneToMany(fetch = FetchType.EAGER,  mappedBy = "customer", cascade = CascadeType.ALL)
	@JsonManagedReference
	private List<Complain> complain=new ArrayList<Complain>();
	public Customer() {
		super();
		// TODO Auto-generated constructor stub
	}
	public Long getCusId() {
		return cusId;
	}
	public void setCusId(Long cusId) {
		this.cusId = cusId;
	}
	public String getFirstName() {
		return firstName;
	}
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}
	public String getLastName() {
		return lastName;
	}
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}
	public String getAdd() {
		return add;
	}
	public void setAdd(String add) {
		this.add = add;
	}
	public int getTel() {
		return tel;
	}
	public void setTel(int tel) {
		this.tel = tel;
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getUsername() {
		return username;
	}
	public void setUsername(String username) {
		this.username = username;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public List<Complain> getComplain() {
		return complain;
	}
	public void setComplain(List<Complain> complain) {
		this.complain = complain;
	}
	
}

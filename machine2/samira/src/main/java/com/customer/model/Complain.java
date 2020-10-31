package com.customer.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

import javax.persistence.Table;

@Entity
@Table(name="Complain")

public class Complain {
	
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;
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
	
	@Column(name="repfirst")
	private String repfirst;
	
	@Column(name="replast")
	private String replast;
	
	
	@Column(name="warranty")
	private String warranty;
	
	@Column(name="DOP")
	private String DOP;
	
	public Complain() {
	
	}

	@Column(name="Nomachine")
	private String Nomachine;
	
	@Column(name="Complain")
	private String Complain;

	
	
	
	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
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

	public String getRepfirst() {
		return repfirst;
	}

	public void setRepfirst(String repfirst) {
		this.repfirst = repfirst;
	}

	public String getReplast() {
		return replast;
	}

	public void setReplast(String replast) {
		this.replast = replast;
	}

	public String getWarranty() {
		return warranty;
	}

	public void setWarranty(String warranty) {
		this.warranty = warranty;
	}

	public String getDOP() {
		return DOP;
	}

	public void setDOP(String DOP) {
		this.DOP = DOP;
	}

	public String getNomachine() {
		return Nomachine;
	}

	public void setNomachine(String nomachine) {
		Nomachine = nomachine;
	}

	public String getComplain() {
		return Complain;
	}

	public void setComplain(String complain) {
		Complain = complain;
	}
	
	
	

	
}

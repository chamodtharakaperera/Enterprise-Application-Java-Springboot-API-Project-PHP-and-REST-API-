package com.customer.model;


import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;

import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import com.fasterxml.jackson.annotation.JsonBackReference;

@Entity
@Table(name="Complain")

public class Complain {
	
	@Id
	@GeneratedValue
	private Long id;
	
	@Column(name="repfirst")
	private String repfirst;
	
	@Column(name="replast")
	private String replast;
	
	
	@Column(name="warranty")
	private String warranty;
	
	@Column(name="dop")
	private String purDate;
	
	@Column(name="Nomachine")
	private String Nomachine;
	
	@Column(name="Complain")
	private String Complain;

	@ManyToOne(fetch = FetchType.EAGER)
	@JoinColumn(name="cus_id", referencedColumnName = "cusId")
    @JsonBackReference
	private Customer customer;

	
	public Complain() {
		
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
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

	public String getPurDate() {
		return purDate;
	}

	public void setPurDate(String purDate) {
		this.purDate = purDate;
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

	public Customer getCustomer() {
		return customer;
	}

	public void setCustomer(Customer customer) {
		this.customer = customer;
	}
	
	}

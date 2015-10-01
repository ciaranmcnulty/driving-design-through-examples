autoscale: true

# Driving Design with Examples
## [fit] **Ciaran McNulty at PHPNW 2015**

---

# Modelling by Example
## **Combining BDD and DDD concepts**

---

# **B**ehaviour **D**riven **D**evelopment

---

> BDD is the art of using examples in conversations to illustrate behaviour
 -- Liz Keogh

---

# Why **Examples**?

---

# Rules

-  Orders costing more than £10 get £2 shipping cost
-  Orders costing less than £10 get £3 shipping cost
-  Sales tax is charged at 20%

---

# Rules are **Ambiguous**

---

# Ambiguity

- What if the order is exactly £10?
- What if the cost is <£10 but including tax is >£10?
- Does tax get applied to the shipping cost too?

---

# Examples are **Unambiguous**

---

# Examples

- An order costing £9 gets £3 shipping and £1.80 tax
- An order costing £10 gets £3 shipping and £2 tax
- An order costing £10.01 gets £2 shipping and £2 tax

---

# Examples are **Objectively Testable**

---

# **Gherkin**
## A formal language for examples
![](gherkin.jpg)

---

```gherkin
Feature: Pricing items in the basket

  Rules:
    - Orders costing more than £10 get £2 shipping cost
    - Orders costing less than £10 get £3 shipping cost
    - Sales tax is charged at 20%

  Scenario: Order less than £10 gets higher rate of shipping
    Given ...

  Scenario: Order exactly £10 gets higher rate of shipping
    Given ...

  Scenario: Order higher than £10 gets lower rate of shipping
    Given ...

```

---

# Gherkin steps

* **Given** sets up context
* **When** specifies some action
* **Then** specifies some outcome

Action + outcome = behaviour

---

```gherkin

Scenario: Order less than £10 gets higher rate of shipping
  Given an order costs £0.10
  When the order is processed
  Then the shipping cost should be £3
  And the VAT should be £0.02 

Scenario: Order more than £10 gets lower rate of shipping
  Given an order costs £100000
  When the order is processed
  Then the shipping cost should be £2
  And the VAT should be £20000

```

---

# Who writes examples?

**Business** expert
**Testing** expert
**Development** expert

All discussing the feature together

![](three-amigos.jpg)

---

# When to write scenarios

* **Before** you start work on the feature
* Not **too long** before!
* Whenever you have access to the **right people**

---

# Refining scenarios

* When would this outcome **not** be true?
* What **other** outcomes are there?
* But what would happen **if**...?
* Does this **implementation detail** matter?

^ Liz - what if pixies did it?

---

# **Scenarios** are not *Contracts*

![](contract.jpg)

---

# Scenarios

* Create a **shared understanding** of a feature
* Give a starting definition of **done**
* Provide an objective indication of **how to test** a feature

---

# **D**omain **D**riven **D**esign

---

> DDD tackles complexity by focusing the team's attention on knowledge of the domain
-- Eric Evans

---

# [fit] Invest time in
# [fit] **understanding** 
# [fit] the business 

---

# Ubiquitous Language

* A **shared** way of speaking about domain concepts
* Reduces the **cost of translation** when business and development communicate
* Try to establish and use **terms the business will understand**

---

# **M**odelling **b**y **E**xample

---

# Principles

* The best way to **understand the domain** is by **discussing examples**
* Write scenarios that **capture ubiquitous language**
* Write scenarios that **illustrate real situations**
* **Directly drive the code model** from those examples

---

```gherkin

Scenario: Order less than £10 gets higher rate of shipping
  Given an order costs £0.10
  When the order is processed
  Then the shipping cost should be £3
  And the VAT should be £0.02 

Scenario: Order more than £10 gets lower rate of shipping
  Given an order costs £100000
  When the order is processed
  Then the shipping cost should be £2
  And the VAT should be £20000 

```

---

# Add **realistic** details

---

```gherkin

Scenario: Order less than £10 gets higher rate of shipping
  Given a "Blue T-shirt" costs £4
  When the order for a "Blue T-shirt" is processed
  Then the shipping total should be £3
  And the VAT should be £0.80 

Scenario: Order more than £10 gets lower rate of shipping
  Given "Blue Jeans" cost £49.50
  When the order for "Blue Jeans" is processed
  Then the shipping cost should be £2
  And the VAT should be £9.90 

```

^ Enhances communication

---

# **Actively seek** terms from the domain

---

* Do you call it "Cost" or "Price" or what?
* Is the cost something that's attached to the Product?
* What do you call it when an order is processed?
* Is "shipping cost" the term you use?
* Is "VAT" the term you use?
* **How do you think about these things**?

---

```gherkin

Scenario: Order less than £10 gets higher rate of shipping
  Given a "Blue T-shirt" stock item has been priced at £4 in the catalogue
  When I add "Blue T-shirt" to my basket
  And check out my basket
  Then the shipping rate should be £3
  And the sales tax should be £0.80 

Scenario: Order more than £10 gets lower rate of shipping
  Given a "Blue Jeans" stock item has been priced at £49.50 in the catalogue
  When I add "Blue Jeans" to my basket
  And check out my basket
  Then the shipping rate should be £2
  And the sales tax should be £9.90 

```

---

# Lessons from the conversation

* Terms are **"shipping rate"**, **"sales tax"**, **"check out"**
* Customer thinks about the rates being calculated **after** checkout (!)
* Customer thinks about cost being held by the catalogue, not the basket (!!)
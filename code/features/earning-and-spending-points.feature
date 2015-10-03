Feature: Earning and spending points on flights

  Rules:
  - Travellers can collect 1 point for every £1 they spend on flights
  - 100 points can be redeemed for £10 off a future flight

  Background:
    Given a flight "XX-100" flies the "LHR" to "MAN" route
    And the current listed fare for the "LHR" to "MAN" route is £50

  Scenario: Earning points when paying cash
    When I am issued a ticket on flight "XX-100"
    And I pay £50 cash for the ticket
    Then the ticket should be completely paid
    And the ticket should be worth 50 loyalty points
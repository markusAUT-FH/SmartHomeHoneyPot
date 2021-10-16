# SmartHomeHoneyPot
Code Repository for my Master thesis "Design of a Honeypot for Smart Home"

## Problems and Motivation
Smart home equipment offers a lot of comfort in any apartment or house; it is little wonder that such gadgetry becomes more and more popular all over.  Homeowners, however, are unaware of the huge number of threats looming on them. Based on a study from Statista, the number one risks associated with smart homes are hacker attacks. Nonetheless, only few additional defence mechanisms are applied. Along with the rising popularity of the internet of things (IoT) more and more private households are attacked by criminals. 

In 2019 attackers were able to hijack the smart home installation of a couple living in Milwaukee, US. They installed a camera, a doorbell and a thermostat in order to feel safe and secure and to enjoy more comfort. Unfortunately, what they achieved was the complete opposite. One day a voice was talking to them via the camera while, all of a sudden, the thermostat temperature shifted to 90°F (32.2°C). Luckily, no other smart devices were connected; otherwise, the consequences might have been even more precarious. In the end the owners were deeply troubled that the 700$ installation obviously could be misemployed as an unauthorized entrance to their home. 

Based on a forecast by the company Statista the number of smart homes in Austria will double up within the next five years from 0.81 million in 2020 to 1.69 million in 2025. Therefore, it is important that cybersecurity be not only considered within enterprises but also with respect to private homes. Network security appliances such as firewall or intrusion detection/prevention (IDS/IPS) systems are fairly expensive and only very few private people will own one. Another downside is that these systems have to be regularly updated and the configuration is by no means trivial. In other words, there have to be simpler solutions of counteracting attacks.

One possible device that might be suitable for a small environment are so-called ‘honeypots’. A honeypot is a specially crafted server that pretends to be a typical smart home device in order to attract attackers. The huge benefit of honeypots is that they are cheap and that they do not produce any false positive alerts as do other systems. The reason for that is that authorized users will not connect to the honeypot, because they know the real system. One disadvantage of a honeypot is that it does not work proactively. So, it can only detect an attack if the attacker is already inside the network and tries to connect to the honeypot. 
Before a honeypot can be used it is pivotal to analyse possible attack vectors. Without knowing the risks it is impossible to design a working security concept. Not all attack vectors can be exploited right away. Therefore, it is important to analyse how current home automation products deal with these threats. This analysis will be used for a more specific honeypot configuration. 

## Research Questions:
* What attack vectors do exist in smart homes and how can a honeypot be used to detect an attack?
* Which configuration of a honeypot is needed to reduce the chance of being detected by an attacker?

## Objectives
The implementation and the configuration of a honeypot is of key importance. Otherwise, a honeypot might even reduce the level of IT security instead of increasing it. Theoretical knowledge of the individual components of a honeypot implementation is imperative to create an accurate and efficient honeypot. Therefore, the most important components and their intended purpose will be introduced gradually; the respective information will be provided step by step.

To enhance the configuration of a honeypot a detailed analysis of potential attack vectors will be carried out. This information will be needed for creating a more specific configuration and behaviour of the honeypot. Such a specific and tailored solution can provide a higher security level compared to a generic approach.
An analysis of state-of-the-art smart home implementation will be made. The focus will be on how vendors usually deal with the already discussed attack vectors. That way, the honeypot can be included into an overall security strategy. 

## Related Work
Know your enemy : learning about security threats ; the Honeynet Project

ISBN: 9780321166463

Honeypots : a new paradigm to information security

ISBN: 9781578087082

B. Lingenfelter, I. Vakilinia and S. Sengupta, "Analyzing Variation Among IoT Botnets Using Medium Interaction Honeypots," 2020 10th Annual Computing and Communication Workshop and Conference (CCWC), 2020, pp. 0761-0767, doi: 10.1109/CCWC47524.2020.9031234.


## Approach 
The first section of this thesis will prepare all theoretical knowledge. This theoretical foundation is needed to make sure that the following theories and guidelines are well intelligible. All parts of a honeypot implementation will be explained in detail.

The next step will be to analyse possible attack vectors of a smart home and to look at existing home automation products and how these products are usually protected against unauthorized access.

Based on the theoretical knowledge and the aforementioned attack vectors a proof-of-concept implementation of a honeypot will be built. This honeypot will pretend to be a camera, a heating control and a file share and will be hosted on a Raspberry Pi platform. 

Finally, the conclusion of this master thesis will outline a configuration guideline for the implementation of a honeypot as well as provide a detailed analysis of potential risks and how vendors deal with them.

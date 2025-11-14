import pandas as pd
import matplotlib.pyplot as plt
import numpy as np

# 1. Load the dataset
df = pd.read_csv('data/cybersecurity_behavior.csv')

# 2. Preview the first 5 rows
print("Preview of dataset:")
print(df.head())

# 3. Bar chart: Average phishing awareness by age group
df['age_group'] = pd.cut(df['age'], bins=[15, 25, 35, 45, 60], labels=['15-25', '26-35', '36-45', '46-60'])
phishing_by_age = df.groupby('age_group')['phishing_awareness'].mean()

phishing_by_age.plot(kind='bar', color='skyblue')
plt.title('Average Phishing Awareness by Age Group')
plt.xlabel('Age Group')
plt.ylabel('Awareness Score')
plt.tight_layout()
plt.show()

# 4. Pie chart: Password reuse behavior
reuse_counts = df['password_reuse'].value_counts()
reuse_counts.plot(kind='pie', autopct='%1.1f%%', labels=['Reuses Passwords', 'Does Not Reuse'], colors=['tomato', 'lightgreen'])
plt.title('Password Reuse Behavior')
plt.ylabel('')
plt.tight_layout()
plt.show()

# 5. Radar chart: Threat awareness profile
labels = ['Phishing Awareness', 'Password Reuse', 'Social Engineering Risk']
values = [
    df['phishing_awareness'].mean(),
    df['password_reuse'].mean(),
    df['social_engineering_risk'].mean()
]

angles = np.linspace(0, 2 * np.pi, len(labels), endpoint=False).tolist()
values += values[:1]
angles += angles[:1]

fig, ax = plt.subplots(figsize=(6,6), subplot_kw=dict(polar=True))
ax.plot(angles, values, color='blue', linewidth=2)
ax.fill(angles, values, color='blue', alpha=0.25)
ax.set_xticks(angles[:-1])
ax.set_xticklabels(labels)
plt.title('Average Threat Awareness Profile')
plt.tight_layout()
plt.show()

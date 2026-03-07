<?php

namespace Database\Factories\Providers;

use Faker\Provider\Base;

class MeaningfulDataProvider extends Base
{
    protected static array $topics = [
        [
            'protocol_title'   => 'Sauna Protocol for Cardiovascular Health',
            'protocol_content' => "Regular sauna use 3-4 times per week has been linked to improved cardiovascular health and longevity in multiple large-scale studies.\n\n**Protocol:**\n- Session 1-2: 10-15 minutes at 80°C\n- Session 3-4: 15-20 minutes at 90-100°C\n- Always finish with a cool shower or cold plunge\n- Hydrate with electrolytes before and after\n\n**Frequency:** 3-4x per week for cardiovascular benefits. 2x per week for recovery.\n\nHeat stress triggers heat shock proteins, improves endothelial function, and increases plasma volume over time. Start conservatively and build duration gradually.",
            'tags'             => ['sauna', 'heat-therapy', 'recovery', 'longevity', 'hormesis'],
            'thread_titles'    => [
                'Sauna and cold contrast therapy — the protocol that changed my recovery',
                'How often is too often? Finding the optimal sauna frequency',
                'Sauna for mental health — my 90 day experience',
                'Home sauna vs gym sauna — practical considerations',
            ],
            'thread_bodies'    => [
                "I have been doing sauna 4x per week for six months and wanted to share what the data looks like.\n\nMy resting heart rate dropped from 68 to 58 bpm. My HRV increased from an average of 42 to 67. My recovery scores between training sessions improved significantly.\n\nThe cardiovascular adaptation mirrors what you see from endurance training. The heart is working hard during sauna exposure — it is essentially a passive cardio session.",
                "Sauna and cold plunge contrast therapy has become the single most effective recovery tool in my routine.\n\n**My protocol:** 15 min sauna → 2 min cold plunge → 5 min rest. Repeat 3 rounds.\n\nThe contrast between heat and cold creates a powerful pump effect in the vasculature. Blood vessels rapidly dilate and constrict, improving circulation and clearing metabolic waste from muscles.",
            ],
            'comments'         => [
                "Start with shorter sessions and work up. Heat adaptation takes 2-3 weeks.",
                "The mental clarity after a sauna session is unlike anything else I have experienced.",
                "Electrolyte replacement after sauna is non-negotiable. I learned this the hard way.",
                "Combining sauna with cold exposure amplifies the benefits of both significantly.",
            ],
        ],
        [
            'protocol_title'   => 'Dopamine Detox: Resetting Reward Pathways',
            'protocol_content' => "Chronic overstimulation from social media, junk food, and constant entertainment desensitizes dopamine receptors, leading to motivation loss and inability to focus.\n\n**30-Day Detox Protocol:**\n\n**Remove completely:**\n- Social media (replace with scheduled weekly check-ins)\n- Video games and streaming binges\n- Junk food and sugar\n- Recreational substances\n\n**Replace with:**\n- Daily exercise (any form)\n- Reading physical books\n- Time in nature\n- Journaling and reflection\n- Meaningful in-person conversation\n\nThe first week produces withdrawal-like symptoms — boredom, restlessness, irritability. This is normal. By week three most people report dramatically improved baseline mood and motivation.",
            'tags'             => ['dopamine', 'mental-health', 'stress', 'neuroplasticity', 'journaling'],
            'thread_titles'    => [
                'Day 30 dopamine detox complete — what actually happened',
                'The withdrawal phase is real — how to get through week one',
                'Permanent lifestyle changes vs temporary detox — what is the point?',
                'Dopamine detox and productivity — the connection I did not expect',
            ],
            'thread_bodies'    => [
                "Completed a strict 30-day dopamine detox and want to give an honest report.\n\nDays 1-7: Uncomfortable. I did not realize how much I was using stimulation to avoid being alone with my thoughts. The boredom was intense.\nDays 8-14: Started finding genuinely boring activities enjoyable. Read two books. Went on long walks without headphones.\nDays 15-30: Significant shift in baseline. Work felt more engaging. Social interactions felt more meaningful.\n\nThe goal was not permanent abstinence. It was resetting my baseline sensitivity. I reintroduced entertainment selectively and intentionally rather than habitually.",
                "The detox revealed something I was not expecting — most of my social media and entertainment use was avoidance behavior.\n\nI was using stimulation to avoid anxiety, boredom, difficult emotions, and challenging work. When I removed the escape route I had to face what I was avoiding.\n\nThis made the first two weeks significantly harder than expected. But it also made the protocol significantly more valuable. If you find the detox very difficult, that difficulty is telling you something important about your relationship with stimulation.",
            ],
            'comments'         => [
                "The boredom in week one is the medicine. Sit with it instead of escaping it.",
                "I did not realize how addicted I was to constant stimulation until I tried to stop. Eye opening.",
                "Replace social media time with walking. That single substitution makes the detox dramatically easier.",
                "Three months post-detox and I have maintained the core changes. My relationship with my phone is fundamentally different.",
            ],
        ],
        [
            'protocol_title'   => 'Zone 2 Cardio for Longevity and Aerobic Base',
            'protocol_content' => "Zone 2 training keeps heart rate at 60-70% of maximum — a conversational pace where you can speak in complete sentences.\n\n**Why it matters:** Zone 2 specifically develops mitochondrial density and fat oxidation capacity — the foundation of metabolic health and longevity.\n\n**Protocol:**\n- 45-60 minutes per session\n- 3-4 sessions per week\n- Heart rate: 130-150 bpm for most people (use a monitor)\n- Good options: cycling, brisk walking, light jogging, rowing\n\n**Progress marker:** After 8-12 weeks your pace at the same heart rate should improve by 15-25%, indicating improved aerobic efficiency.\n\nMost people train too hard. Slow down more than feels right.",
            'tags'             => ['zone-2', 'longevity', 'movement', 'mitochondria', 'recovery'],
            'thread_titles'    => [
                'Zone 2 for 6 months — my aerobic efficiency data',
                'How slow is slow enough? Getting zone 2 right',
                'Combining zone 2 with strength training — the optimal split',
                'Zone 2 transformed my relationship with cardio',
            ],
            'thread_bodies'    => [
                "Six months of consistent zone 2 training, 4x per week, 50 minutes per session. Here is the objective data.\n\nAt the same heart rate (138 bpm), my cycling pace improved from 18 km/h to 24 km/h. That is a 33% improvement in aerobic efficiency.\n\nMy resting heart rate dropped from 64 to 52. My VO2 max estimate on my Garmin went from 42 to 51.\n\nThe hardest part was going slow enough. For the first month I felt like I was barely exercising. The data told a different story.",
                "I used to hate cardio because I always did it wrong — too hard to be sustainable, not hard enough to feel like real training.\n\nZone 2 changed my relationship with cardio entirely. At the right intensity it is almost meditative. I listen to podcasts and genuinely look forward to it.\n\nThe key insight: the discomfort of hard cardio is not what drives the adaptation. The volume at the right zone is. An hour at zone 2 produces more mitochondrial adaptation than 20 minutes at zone 4.",
            ],
            'comments'         => [
                "Most people who think they are doing zone 2 are actually in zone 3. Get a heart rate monitor and slow down.",
                "The aerobic base you build in zone 2 makes all other training more effective. It is the foundation.",
                "I walk fast for my zone 2. No running required. Sustainable for life.",
                "Six weeks in and I can feel the difference in my recovery between sessions.",
            ],
        ],
        [
            'protocol_title'   => 'Magnesium Supplementation for Sleep and Recovery',
            'protocol_content' => "Magnesium is involved in over 300 enzymatic processes and deficiency is widespread, contributing to poor sleep, muscle cramps, anxiety, and fatigue.\n\n**Forms and uses:**\n- Magnesium Glycinate: Best for sleep and anxiety. High absorption, gentle on digestion.\n- Magnesium Malate: Best for energy and muscle recovery.\n- Magnesium L-Threonate: Best for cognitive function and brain health.\n\n**Protocol:**\n- Start with 200mg magnesium glycinate before bed\n- Increase to 400mg if no digestive issues after one week\n- Take with or after food\n- Allow 2-4 weeks for full effects\n\n**Dietary sources:** Pumpkin seeds, dark chocolate, leafy greens, legumes, nuts.",
            'tags'             => ['magnesium', 'sleep', 'recovery', 'supplementation', 'stress'],
            'thread_titles'    => [
                'Magnesium glycinate changed my sleep quality overnight',
                'Which form of magnesium for which purpose — a practical guide',
                'Magnesium and anxiety — my three month update',
                'Why most people are magnesium deficient and do not know it',
            ],
            'thread_bodies'    => [
                "I was skeptical about magnesium because I had tried cheap magnesium oxide years ago with no results. The form matters enormously.\n\nSwitched to magnesium glycinate 400mg before bed three months ago. Results within the first week:\n- Falling asleep faster (from ~45 min to ~15 min)\n- Fewer night wakings\n- Noticeably less muscle soreness after training\n- Reduced background anxiety\n\nMagnesium oxide has poor bioavailability. Glycinate, malate, and threonate are absorbed significantly better. The form is the difference between results and no results.",
                "Magnesium deficiency symptoms match modern epidemic conditions almost perfectly: poor sleep, anxiety, muscle tension, fatigue, headaches, constipation.\n\nThe reason deficiency is so common: modern soil depletion means even whole foods contain significantly less magnesium than decades ago. Stress depletes magnesium rapidly. Alcohol and caffeine increase excretion.\n\nThe easiest intervention with the most broad-spectrum benefit I have found in five years of optimizing my health. Start here before anything more complex.",
            ],
            'comments'         => [
                "The glycinate form is worth the extra cost. Cheap magnesium oxide does nothing for most people.",
                "I take magnesium malate in the morning for energy and glycinate at night for sleep. Game changer.",
                "Two weeks of magnesium glycinate and my leg cramps at night disappeared completely.",
                "Pairs incredibly well with a sleep hygiene protocol. Addresses both behavioral and nutritional components of sleep.",
            ],
        ],
        [
            'protocol_title'   => 'Morning Sunlight Protocol for Cortisol and Energy',
            'protocol_content' => "Morning sunlight exposure is the single highest leverage behavior for regulating energy, mood, and sleep — and it is completely free.\n\n**Protocol:**\n- Get outside within 30 minutes of waking\n- 10 minutes minimum on clear days, 20-30 minutes on overcast days\n- No sunglasses (peripheral light signals through the sides matter)\n- Not through glass — glass blocks the critical wavelengths\n- Move — walk, stretch, or simply stand\n\n**Why it works:** Morning light triggers a cortisol pulse that sets your wake anchor and, 12-16 hours later, triggers melatonin release for sleep.\n\nThis single habit, done consistently for 2 weeks, shifts sleep onset earlier, improves morning energy, and stabilizes mood throughout the day.",
            'tags'             => ['circadian', 'cortisol', 'sleep', 'mental-health', 'hormones'],
            'thread_titles'    => [
                'Ten minutes of morning sunlight changed my sleep schedule completely',
                'Living in a cloudy climate — how to make this protocol work',
                'Morning sunlight combined with cold exposure — the ultimate morning routine',
                'The neuroscience of morning light — why this actually works',
            ],
            'thread_bodies'    => [
                "I live in Seattle where we get maybe 60 sunny days a year. I was convinced this protocol would not work for me.\n\nThree things that made it work despite the climate:\n1. Go out even on cloudy days — overcast sky still provides 10x more light than indoor lighting\n2. Extend the duration — 20-30 minutes on grey days instead of 10\n3. Light therapy lamp as backup for the darkest months\n\nTwo months in and my sleep timing shifted 90 minutes earlier. My morning energy went from barely functional to genuinely alert. This protocol works in any climate with adjustments.",
                "The neuroscience here is well established and worth understanding because it explains why this works so reliably.\n\nThe suprachiasmatic nucleus (SCN) in the hypothalamus is your master circadian clock. It is entrained primarily by light hitting specialized photoreceptors (melanopsin-containing retinal ganglion cells) that are most sensitive to blue-green wavelengths present in morning sunlight.\n\nWhen these cells receive sufficient morning light signal, they set off a cascade: cortisol pulse, serotonin production, and a timer that triggers melatonin release 12-16 hours later.\n\nNo morning light signal = no clear timer = delayed and dysregulated melatonin = poor sleep. The mechanism is direct and well-supported.",
            ],
            'comments'         => [
                "This is the highest ROI habit I have ever adopted. Free, takes 10 minutes, and the effects are immediate.",
                "I was not a morning person for 35 years. Two weeks of morning sunlight walks and I now wake up before my alarm.",
                "The cloudy day version still works. The light levels outside even on overcast days are dramatically higher than indoors.",
                "Combining morning sunlight with a short walk means you get light exposure, movement, and fresh air simultaneously.",
            ],
        ],
        [
            'protocol_title'   => 'Meditation Protocol for Focus and Stress Resilience',
            'protocol_content' => "A structured meditation protocol builds the mental muscle of attention and stress resilience through consistent daily practice.\n\n**8-Week Progressive Protocol:**\n\n**Weeks 1-2:** 5 minutes daily focused attention meditation. Sit comfortably, focus on breath, gently redirect when mind wanders.\n\n**Weeks 3-4:** 10 minutes daily. Add a body scan component — systematically relax each body part.\n\n**Weeks 5-6:** 15 minutes daily. Introduce open monitoring — observe thoughts without following them.\n\n**Weeks 7-8:** 20 minutes daily. Combine techniques based on what is most useful.\n\nConsistency matters more than duration. 5 minutes daily beats 35 minutes once a week.",
            'tags'             => ['meditation', 'stress', 'mental-health', 'focus', 'neuroplasticity'],
            'thread_titles'    => [
                'Eight weeks of daily meditation — what changed and what did not',
                'I could not meditate for years — what finally worked for me',
                'Meditation and ADHD — a realistic assessment',
                'The difference between meditation styles — which one should you start with?',
            ],
            'thread_bodies'    => [
                "Eight weeks of daily meditation, starting at 5 minutes and building to 20. Honest assessment.\n\nWhat changed: My reaction time between stimulus and response expanded noticeably. I catch myself about to react impulsively and have a moment to choose differently. This is the core skill meditation builds and it is genuinely valuable.\n\nMy sleep onset time improved. I attribute this to reduced rumination at bedtime.\n\nWhat did not change: I did not achieve any profound states. No bliss. No enlightenment. Just a measurably calmer, more focused version of my normal self. That is enough.",
                "I failed at meditation consistently for three years before finding what worked for me. The problem was I was trying to clear my mind — which is not what meditation is.\n\nMeditation is not about having no thoughts. It is about noticing when you have drifted and returning. Each return is the rep. The mind wandering is not failure — it is the point.\n\nOnce I understood this, the practice became much more accessible. I stopped grading my sessions as good or bad and started just showing up.",
            ],
            'comments'         => [
                "The mind wandering is not failure. Each time you notice and return is the actual practice.",
                "Start with guided meditations if pure silence feels impossible. Insight Timer has excellent free content.",
                "Consistency over duration. Five minutes daily for a month beats an hour once a week.",
                "The benefits accumulate slowly and then noticeably. Give it eight weeks before judging.",
            ],
        ],
        [
            'protocol_title'   => 'Progressive Overload Strength Protocol for Beginners',
            'protocol_content' => "Progressive overload — systematically increasing the challenge on your muscles over time — is the fundamental principle behind all strength adaptation.\n\n**12-Week Beginner Protocol (3 days per week):**\n\n**Day A:** Squat, Bench Press, Barbell Row\n**Day B:** Squat, Overhead Press, Deadlift\n\nAlternate A/B/A one week, B/A/B the next.\n\n**Loading:** Start with a weight you can lift for 5 reps with perfect form. Add 2.5-5kg per session.\n\n**When you fail to complete reps:** Deload 10% and rebuild.\n\nTrack every session. The log is the protocol. If you are not tracking, you are not progressive overloading.",
            'tags'             => ['strength-training', 'movement', 'recovery', 'hormones', 'longevity'],
            'thread_titles'    => [
                'Three months of linear progression — my beginner strength results',
                'The most common beginner mistakes that kill progress',
                'Strength training and sleep quality — the connection I did not expect',
                'How to combine strength training with other health protocols',
            ],
            'thread_bodies'    => [
                "Three months of linear progression strength training, training three days per week. Starting numbers and current numbers:\n\nSquat: 60kg → 102.5kg\nBench: 40kg → 67.5kg\nDeadlift: 80kg → 132.5kg\nOverhead Press: 30kg → 47.5kg\n\nThis rate of progress is normal for beginners and is not sustainable forever. But linear progression works until it does not — and for beginners it works for longer than most people expect.\n\nThe key: show up consistently, add weight when you hit your rep targets, eat enough protein, sleep enough.",
                "The most common mistakes I see beginners make that kill their progress:\n\n1. Starting too heavy. Ego loading prevents learning the movement and limits long-term progress.\n2. Not tracking. Without a log you cannot know if you are progressing.\n3. Program hopping. Every program works for beginners. Consistency with any program beats constantly switching.\n4. Under-eating protein. Strength adaptation requires protein. 1.6-2.2g per kg of bodyweight minimum.\n5. Not sleeping enough. Most muscle growth happens during sleep. Eight hours is not optional.",
            ],
            'comments'         => [
                "Linear progression works until it does not. Ride it as long as possible before switching to intermediate programming.",
                "Track every session without exception. The log is your coach.",
                "Protein and sleep are as important as the training itself. You do not grow in the gym.",
                "Start lighter than your ego wants. Perfect movement patterns before loading.",
            ],
        ],
        [
            'protocol_title'   => 'Cold Exposure Therapy for Inflammation Reduction',
            'protocol_content' => "This protocol involves daily cold exposure starting at 30 seconds and gradually increasing to 3 minutes over 4 weeks...\n\n**Week 1:** 30 seconds cold at end of shower\n**Week 2:** 60 seconds cold\n**Week 3:** 2 minutes full cold shower\n**Week 4:** 3 minutes cold plunge if available\n\nResearch suggests cold exposure activates brown adipose tissue and reduces systemic inflammation markers. Avoid if you have cardiovascular conditions.",
            'tags'             => ['cold-therapy', 'inflammation', 'recovery', 'hormesis'],
            'thread_titles'    => [
                'My 30-day cold shower experience — what actually changed',
                'Cold plunge vs cold shower — is there a real difference?',
                'How cold is cold enough? Temperature breakdown',
                'Cold exposure and cortisol — what the research says',
            ],
            'thread_bodies'    => [
                "Started cold showers 6 weeks ago and wanted to share what actually changed...\n\nWeek 1-2: Miserable. The mental resistance was stronger than the physical discomfort.\nWeek 3: Something shifted. I started looking forward to it.\nWeek 4-6: My post-workout soreness is noticeably reduced and I feel more alert in the mornings.\n\nThe inflammation reduction was the original goal but the mental resilience training turned out to be the bigger benefit.",
                "I invested in a cold plunge tub after 3 months of cold showers and wanted to compare the two honestly.\n\nCold showers are more convenient and free. They train the mental side very effectively. Temperature control is limited though — most showers get to around 55-60°F.\n\nCold plunge allows precise temperature control and full body immersion. The physiological response at 50°F for 3 minutes seems meaningfully different from a cold shower.\n\nMy take: start with cold showers for 60-90 days, then consider a plunge if you want to go deeper.",
            ],
            'comments'         => [
                "The mental adaptation is the real protocol here. Cold exposure is just the vehicle.",
                "I combine this with sauna contrast therapy and the recovery benefits are significantly amplified.",
                "For anyone nervous about starting — begin with just 15 seconds at the end of your normal shower. It is enough to get the adaptation signal.",
            ],
        ],
        [
            'protocol_title'   => 'Intermittent Fasting 16:8 for Metabolic Health',
            'protocol_content' => "The 16:8 intermittent fasting protocol restricts eating to an 8-hour window daily. Most practitioners eat between 12pm-8pm.\n\n**Benefits reported:** improved insulin sensitivity, reduced inflammation, mental clarity, and simplified meal planning.\n\n**Getting started:**\n- Week 1: Eat within a 10-hour window\n- Week 2: Narrow to 9 hours\n- Week 3-4: Reach your 8-hour target\n\nDuring the fasting window: water, black coffee, and plain tea only. Break your fast with protein and healthy fats rather than carbohydrates.",
            'tags'             => ['fasting', 'nutrition', 'metabolism', 'insulin', 'gut-health'],
            'thread_titles'    => [
                'Six months of 16:8 — my honest metabolic bloodwork results',
                'Breaking the fast with protein vs carbs — does it matter?',
                'Fasting and working out — how to time training around your window',
                'I tried every fasting schedule — here is what worked long term',
            ],
            'thread_bodies'    => [
                "Six months of consistent 16:8 fasting and I finally got bloodwork done to see if the subjective improvements were real.\n\nFasting insulin: dropped from 12.4 to 7.1 (significant improvement in insulin sensitivity)\nHbA1c: 5.8 to 5.4\nTriglycerides: 180 to 124\nHDL: increased from 48 to 57\n\nI changed nothing else — same foods, same exercise. The eating window restriction alone drove these changes over 6 months.",
                "I have experimented with 14:10, 16:8, 18:6, and OMAD over the past two years.\n\n**14:10:** Easy to maintain, mild benefits, good entry point.\n**16:8:** Sweet spot for most people. Meaningful benefits without significant lifestyle disruption.\n**18:6:** Noticeably better cognitive clarity but social eating becomes difficult.\n**OMAD:** Powerful but unsustainable long term for me. Lost muscle mass despite high protein intake.\n\nI settled on 16:8 on weekdays and relaxed 12:12 on weekends. Sustainable and effective.",
            ],
            'comments'         => [
                "The hunger on day 3-5 is the peak. After that your body adapts and the hunger signals normalize.",
                "Black coffee during the fast is a game changer for getting through the morning.",
                "I fast from 8pm to 12pm — works perfectly with a normal dinner and skipping breakfast.",
            ],
        ],
        [
            'protocol_title'   => 'Sleep Optimization Through Circadian Rhythm Alignment',
            'protocol_content' => "Optimizing sleep starts with regulating your circadian rhythm through consistent light signals.\n\n**Morning:** 10 minutes of direct outdoor sunlight within 30 minutes of waking. This sets your cortisol peak and anchors your circadian clock.\n\n**Evening:** Dim lights after sunset. Use blue light blocking glasses or switch to warm bulbs after 8pm.\n\n**Sleep environment:**\n- Temperature: 65-68°F\n- Complete darkness\n- White noise if needed\n- No screens 60 minutes before bed\n\n**Supplements:** Magnesium glycinate 200-400mg, taken 1 hour before bed.",
            'tags'             => ['sleep', 'circadian', 'cortisol', 'magnesium', 'recovery'],
            'thread_titles'    => [
                'Morning sunlight changed my sleep — the mechanism explained',
                'Blue light blocking glasses — do they actually work?',
                'My sleep score went from 60 to 85 in 3 weeks — what changed',
                'Dealing with sleep anxiety — the protocol that helped me',
            ],
            'thread_bodies'    => [
                "I want to explain why morning sunlight is the most important part of this protocol because most people skip it thinking it sounds too simple.\n\nMorning light exposure (ideally outdoor, not through glass) triggers a cortisol pulse that sets your wake anchor. This same signal, 12-16 hours later, triggers melatonin release — your sleep anchor.\n\nWithout the morning signal, your melatonin release is delayed and irregular. This is why night owls are often just people who lack consistent morning light, not fundamentally different biology.\n\nTwo weeks of consistent morning light exposure will shift your natural sleep onset earlier by 1-2 hours for most people.",
                "Sleep anxiety kept me in a vicious cycle for two years. The harder I tried to sleep the worse it got.\n\nWhat finally worked was paradoxical intention — I stopped trying to sleep and just rested. I also added: consistent wake time regardless of sleep quality, getting out of bed after 20 minutes if not asleep, and only using the bed for sleep.\n\nThe circadian protocol stabilized my timing but addressing the anxiety component was equally important. Sleep is a passive process — you cannot force it, only create conditions for it.",
            ],
            'comments'         => [
                "The morning sunlight tip sounds too simple but it genuinely works. Two weeks in and I am falling asleep an hour earlier naturally.",
                "Blackout curtains were the single highest ROI change I made. Complete darkness made an immediate difference.",
                "Consistent wake time is the anchor. Even if you have a bad night, get up at the same time. It recalibrates faster.",
            ],
        ],
        [
            'protocol_title'   => 'Gut Health Reset: 30-Day Elimination Diet',
            'protocol_content' => "The gut microbiome influences immunity, mood, metabolism, and inflammation. This 30-day reset systematically identifies and eliminates triggers.\n\n**Phase 1 — Elimination (Days 1-14):**\nRemove: gluten, dairy, refined sugar, alcohol, seed oils, processed foods, and legumes.\n\n**Phase 2 — Restoration (Days 15-21):**\nAdd fermented foods daily: sauerkraut, kimchi, kefir (coconut if dairy-free), kombucha.\n\n**Phase 3 — Reintroduction (Days 22-30):**\nReintroduce one eliminated food every 3 days. Track symptoms for 72 hours after each reintroduction.\n\nKeep a detailed food and symptom journal throughout all three phases.",
            'tags'             => ['gut-health', 'elimination-diet', 'microbiome', 'inflammation', 'nutrition'],
            'thread_titles'    => [
                'What I discovered about my body after the elimination phase',
                'The reintroduction phase is where the real information is',
                'Fermented foods guide for the restoration phase',
                'Gut protocol and mental health — the connection is real',
            ],
            'thread_bodies'    => [
                "The elimination phase was hard. The reintroduction phase was illuminating.\n\nAfter 14 days of feeling significantly better, I started adding foods back one at a time. The results were clear:\n\nGluten: bloating and brain fog within 6 hours. Consistent across three separate tests.\nDairy: mild digestive discomfort but manageable.\nRefined sugar: mood crash and fatigue 2 hours later.\nLegumes: no noticeable reaction.\n\nI had blamed stress for my brain fog for years. It was gluten the entire time. This protocol gave me information that years of general healthy eating never did.",
                "The gut-brain connection became very real to me during this protocol. By day 10 of the elimination phase my mood had improved more than any antidepressant I had tried.\n\nThe research on the gut-brain axis is solid — 90% of serotonin is produced in the gut. When your microbiome is dysregulated, neurotransmitter production is affected.\n\nI am not saying this replaces mental health treatment. But I am saying that ignoring gut health while treating mental health is addressing symptoms while ignoring a root cause.",
            ],
            'comments'         => [
                "The first 5 days of elimination are the hardest. After that the cravings largely disappear.",
                "Meal prep is essential for this protocol. Having compliant food ready prevents you from making bad decisions when hungry.",
                "The symptom journal is not optional — it is the whole point. Without tracking you lose the data that makes reintroduction meaningful.",
            ],
        ],
        [
            'protocol_title'   => 'Breathwork Protocol for Anxiety Management',
            'protocol_content' => "This protocol combines multiple breathwork techniques targeting the autonomic nervous system for anxiety relief.\n\n**Morning practice (10 minutes):**\nWim Hof breathing — 30 deep breaths, breath hold, recovery breath. Three rounds.\n\n**Acute anxiety intervention:**\nBox breathing — Inhale 4s, Hold 4s, Exhale 4s, Hold 4s. Repeat until calm.\n\n**Evening wind-down (5 minutes):**\nExtended exhale — Inhale 4s, Exhale 8s. This ratio activates parasympathetic response.\n\nPractice the morning routine daily for 21 days to establish a new baseline. Use the acute and evening techniques as needed.",
            'tags'             => ['breathwork', 'anxiety', 'mental-health', 'stress', 'vagus-nerve'],
            'thread_titles'    => [
                'Breathwork replaced my anxiety medication — my honest story',
                'The science of why extended exhale calms the nervous system',
                'Daily breathwork practice — what 90 days taught me',
                'Wim Hof breathing and anxiety — be careful with this combination',
            ],
            'thread_bodies'    => [
                "I want to be careful about how I frame this because I am not anti-medication and I worked with my psychiatrist throughout.\n\nAfter 18 months on low-dose SSRIs with partial results, I started a structured breathwork practice. Over 6 months, in consultation with my doctor, I tapered off medication while maintaining and deepening the breathwork practice.\n\nThat was 14 months ago. I am not suggesting this is right for everyone — my anxiety was primarily physiological dysregulation rather than trauma-based. But for people whose anxiety lives in their body, breathwork directly addresses the mechanism.",
                "The extended exhale technique works because of a direct physiological mechanism — not placebo.\n\nWhen you exhale, your heart rate slows. When you inhale, it speeds up. This is called respiratory sinus arrhythmia. By making your exhale longer than your inhale, you spend more time in the heart-rate-slowing phase of the breath cycle.\n\nThis directly activates the parasympathetic nervous system through the vagus nerve. The effect is immediate and measurable. Practiced consistently it builds vagal tone over time, raising your baseline resilience to stress.",
            ],
            'comments'         => [
                "The morning Wim Hof practice changed my anxiety baseline more than years of therapy alone. They work well together though.",
                "Important safety note: do not practice Wim Hof breathing in water or while driving. The breath holds can cause loss of consciousness.",
                "Box breathing during panic attacks is genuinely effective. I use it daily now as maintenance rather than just crisis intervention.",
            ],
        ],
    ];

    public function topic(): array
    {
        return static::randomElement(static::$topics);
    }
}
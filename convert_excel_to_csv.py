#!/usr/bin/env python3
"""
Script untuk konversi Excel ke CSV
Gunakan: python convert_excel_to_csv.py "input.xlsx" "output.csv"
"""

import sys
import openpyxl
import csv

def convert_excel_to_csv(excel_file, csv_file):
    try:
        # Load workbook
        wb = openpyxl.load_workbook(excel_file)
        ws = wb.active
        
        # Write to CSV
        with open(csv_file, 'w', newline='', encoding='utf-8-sig') as f:
            writer = csv.writer(f, delimiter=';')
            
            for row in ws.iter_rows(values_only=True):
                # Handle None values
                row = [cell if cell is not None else '' for cell in row]
                writer.writerow(row)
        
        print(f"✅ Konversi berhasil!")
        print(f"📁 Input:  {excel_file}")
        print(f"📁 Output: {csv_file}")
        
        # Show preview
        print(f"\n📋 Preview data:")
        with open(csv_file, 'r', encoding='utf-8-sig') as f:
            for i, line in enumerate(f, 1):
                if i <= 6:
                    print(f"  Baris {i}: {line.rstrip()}")
                else:
                    break
        
        # Count total rows
        with open(csv_file, 'r', encoding='utf-8-sig') as f:
            total = len(f.readlines())
        print(f"\n📊 Total baris: {total}")
        
    except Exception as e:
        print(f"❌ Error: {str(e)}")
        sys.exit(1)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Penggunaan: python convert_excel_to_csv.py <input.xlsx> <output.csv>")
        sys.exit(1)
    
    excel_file = sys.argv[1]
    csv_file = sys.argv[2]
    convert_excel_to_csv(excel_file, csv_file)
